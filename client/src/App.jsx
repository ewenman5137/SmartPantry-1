import React from "react";
import { Routes, Route } from "react-router-dom";
import Home from "./Pages/Home/Home";
import Login from "./Pages/Login/Login";

export default function App() {
  return (
    <Routes>
      <Route path="/Home" element={<Home />} />
      <Route path="/" element={<Login />} />
    </Routes>
  );
}
