import React from "react";

export default function Home() {
  if (!localStorage.getItem("access_token")) {
    window.location.href = "/login";
  }
  return (
    <div>
      <h1>Home</h1>
      <p>Welcome to the home page!</p>
    </div>
  );
}
