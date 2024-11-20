import React from "react";

export default function Home() {
  return (
    <div id="Home">
      <div id="Header">
        <img src="src/assets/images/Home/imageHome.png" alt="image" />
      </div>
      <div className="bloc">
        <h1>Master Your Kitchen with SmartPantry</h1>
        <p>Transform the way you manage your food inventory. Our app helps you track ingredients and discover delicious recipes tailored to what you have on hand.</p>
        <div>
          <a href="">Download</a>
          <a href="">Learn More</a>
        </div>
        <div>
          <img src="src/assets/images/Home/sel.png" alt="" />
          <img src="src/assets/images/Home/carbonadeFlamande.png" alt="" />
        </div>
      </div>
      <div className="bloc">
          <div id="text">
            <h3>Features</h3>
            <h1>Explores Our Innovative Features</h1>
          </div>
          <p>Our app is designed to make food management effortless. With features like inventory alerts and shopping list creation, you'll never run out of essentials. Plus, barcode scanning simplifies tracking your ingredients.</p>
      </div>
      <div className="bloc">
        <div id="containeurFeature">
          <div className="feature">
            <img src="" alt="" />
            <h2>Stay Update with Inventory Alerts</h2>
            <p>Recieve timely notifications when your stock is low</p>
          </div>
        </div>
      </div>
    </div>
  );
}
