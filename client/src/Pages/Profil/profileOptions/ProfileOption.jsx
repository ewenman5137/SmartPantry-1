import React from "react";
import { useState } from "react";
import axios from "axios";
import "../CSS/Profil.css";


export default function ProfileOption() {
  const [ShowUpdateInput, setShowUpdateInput] = useState(false);
  const [ShowDeleteInput, setShowDeleteInput] = useState(false);

  const deleteAccount = () => {
    axios.delete("http://localhost:5000/api/user/delete", {
      headers: {
        Authorization: `${localStorage.getItem("access_token")}`,
      },
    });
  };

  const updatePassword = () => {
    axios.put("http://localhost:5000/api/user/updatePassword", {
      headers: {
        Authorization: `${localStorage.getItem("access_token")}`,
      },
    });
  };

  const logout = () => {
    localStorage.removeItem("access_token");
    window.location.href = "/";
  };

  return (
    <div className="optionContainer">
      <div className="logout">
        <span>Se déconnecter</span>
        <button onClick={logout}>Déconnecter</button>
      </div>
      <div className="delete">
        <span>Supprimer le compte</span>
        <button onClick={() => setShowDeleteInput(!ShowDeleteInput)}>
          Supprimer
        </button>
        {ShowDeleteInput && (
          <form action="">
            <input
              type="password"
              name="password"
              placeholder="Mot de passe"
              autoComplete="off"
            />
            <button onClick={deleteAccount}>Valider</button>
          </form>
        )}
      </div>
      <div className="UpdatePassword">
        <span>Modifier le mot de passe</span>
        <button onClick={() => setShowUpdateInput(!ShowUpdateInput)}>
          Modifier
        </button>
        {ShowUpdateInput && (
          <form action="">
            <input
              type="password"
              placeholder="Ancien mot de passe"
              autoComplete="off"
            />
            <input
              type="password"
              name="password"
              placeholder="Nouveau mot de passe"
              autoComplete="off"
            />
            <input
              type="password"
              name="confirm"
              placeholder="Confirmer le nouveau mot de passe"
              autoComplete="off"
            />
            <button onClick={updatePassword}>Valider</button>
          </form>
        )}
      </div>
    </div>
  );
}
