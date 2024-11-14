import React from "react";
import { useState } from "react";

export default function EmailInput() {
  const [email, setEmail] = useState("");

  return (
    <div className="InputContainer">
      <label htmlFor="email">Email:</label>
      <input
        type="email"
        id="email"
        className="input"
        name="email"
        autoComplete="on"
        value={email}
        onChange={(e) => setEmail(e.target.value)}
      />
    </div>
  );
}
