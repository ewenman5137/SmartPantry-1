import React, { useState, useEffect } from "react";
import ProfileOption from "./profileOptions/profileOption";

export default function Profil() {
  const [Name, setName] = useState("");
  const [email, setEmail] = useState("");

  useEffect(() => {
    const storedName = localStorage.getItem("Name");
    const storedEmail = localStorage.getItem("email");

    setName(storedName);
    setEmail(storedEmail);
  }, []);

  return (
    <div className="containerProfil">
      <div className="profil">
        <div className="userInfo">
          <h1>{`${Name}`}</h1>
          <p>{email}</p>
        </div>
      </div>
      <ProfileOption
        Name={Name}
        email={email}
        setName={setName}
        setEmail={setEmail}
      />
    </div>
  );
}
