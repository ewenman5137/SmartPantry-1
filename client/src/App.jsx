import React from "react";
import { Routes, Route } from "react-router-dom";
import Home from "./Pages/Home/Home";
import Login from "./Pages/Login/Login";
import PropositionDeRecette from "./Pages/PropositionDeRecette/PropositionDeRecette";
import PageRecipe from "./Pages/PageRecipe/PageRecipe";

export default function App() {
  return (
    <Routes>
      <Route path="/" element={<Home />} />
      <Route path="/login" element={<Login />} />
      <Route path="/propositionDeRecette" element={<PropositionDeRecette />} />
      <Route path="/PageRecipe/:id" element={<PageRecipe />} />
    </Routes>
  );
}
