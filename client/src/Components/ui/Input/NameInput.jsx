import React from "react";
import { useState } from "react";

export default function NameInput() {
  const [Name, setName] = useState("");
  return (
    <div className="InputContainer">
      <label htmlFor="Name">Name</label>
      <input
        type="text"
        id="Name"
        className="input"
        name="Name"
        autoComplete="on"
        value={Name}
        onChange={(e) => setName(e.target.value)}
      />
    </div>
  );
}
