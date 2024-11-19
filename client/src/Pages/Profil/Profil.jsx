import React from "react";
import ProfileOption from "./profileOptions/profileOption";
import { useState } from "react";

export default function Profil() {
  return (
    <div className="containerProfil">
      <div className="profil">
        <div className="userPhotos">
          <img
            src="/Img/ProfilImg/ProfilImg.jpg"
            alt="ProfilImg"
            draggable="false"
            // block right-click menu
            onContextMenu={(e) => e.preventDefault()}
          />
        </div>
        <div className="userName">
          <h1>John Doe</h1>
        </div>
      </div>
      <ProfileOption />
    </div>
  );
}
