import React from "react";
import axios from "axios";
import "../CSS/Profil.CSS"

export default function ProfileOption() {
  const logout = () => {
    localStorage.clear();
    window.location.href = "/";
  };

  const deleteAccount = () => {
    axios
      .delete("http://localhost:5000/api/user/delete", {
        headers: {
          Authorization: `${localStorage.getItem("access_token")}`,
        },
      })
      .then(() => {
        alert("Compte supprimé !");
        logout();
      })
      .catch((err) => console.error(err));
  };

  return (
    <div className="optionContainer">
      <div>
        <span>Se déconnecter</span>
        <button onClick={logout}>Quitter</button>
      </div>
      <div>
        <span>Supprimer le compte</span>
        <button onClick={deleteAccount}>Supprimer</button>
      </div>
      <div>
        <span>Changer mot de passe</span>
        <button>Changer</button>
      </div>
    </div>
  );
}
