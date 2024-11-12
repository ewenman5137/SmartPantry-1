import React from "react";

export default function Home() {
  if (!localStorage.getItem("token")) {
    window.location.href = "/Login";
  }
  return (
    <div>
      <h1>Home</h1>
      <p>Welcome to the home page!</p>
    </div>
  );
}
