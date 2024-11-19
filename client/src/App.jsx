import React from "react";
import { Routes, Route } from "react-router-dom";
import Home from "./Pages/Home/Home";
import Login from "./Pages/Login/Login";
import Profil from "./Pages/Profil/Profil";

export default function App() {
  return (
    <Routes>
      <Route path="/" element={<Home />} />
      <Route path="/profil" element={<Profil />} />
      <Route path="/login" element={<Login />} />
    </Routes>
  );
}
