import React from "react";
import "../../assets/styles/Home.css";

export default function Home() {
  if (!localStorage.getItem("access_token")) {
    window.location.href = "/login";
  }
  return (
    <div id="Home">
      <div id="Header">
        <img src="src/assets/images/Home/imageHome.png" alt="image" />
      </div>
      <div className="bloc">
        <div id="containeurText">
          <h1>Master Your Kitchen with SmartPantry</h1>
          <p>Transform the way you manage your food inventory. Our app helps you track ingredients and discover delicious recipes tailored to what you have on hand.</p>
          <div id="containeurBtn">
            <a href="">Download</a>
            <a id="btnLearnMore" href="">Learn More</a>
          </div>
        </div>
        <div id="containeurImageRecette">
          <img id="imageRecette" src="src/assets/images/Home/recette.png" alt="" />
          <img id="imagePoivre" src="src/assets/images/Home/sel.png" alt="" />
        </div>
      </div>
      <div id="blocTextFeature">
          <div id="containeurTextFeature">
            <h3>Features</h3>
            <h1>Explores Our Innovative Features</h1>
          </div>
          <p>Our app is designed to make food management effortless. With features like inventory alerts and shopping list creation, you'll never run out of essentials. Plus, barcode scanning simplifies tracking your ingredients.</p>
      </div>
      <img id="infoImage" src="src/assets/images/Home/info.png" alt="" />
      <div id="containeurChefReviews">
          <div id="gauche">
            <h1>Chef Reviews</h1>
            <p>Find out what others think of our recipes!</p>
            <img src="src/assets/images/Home/fourchette.png" alt="" />
          </div>
          <div id="droite">
            <img src="src/assets/images/Home/avis.png" alt="" />
          </div>
      </div>
    </div>
  );
}
