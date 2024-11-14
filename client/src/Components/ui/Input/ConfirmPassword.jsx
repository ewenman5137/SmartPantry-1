import React from "react";
import { useState } from "react";

export default function ConfirmPassword() {
  const [confirm, setConfirm] = useState("");
  const [showConfirmPassword, setShowConfirmPassword] = useState(false);
  return (
    <div className="InputContainer">
      <label htmlFor="confirm">Confirm Password</label>
      <input
        type={showPassword ? "text" : "password"}
        id="confirm"
        name="confirm"
        className="input"
        autoComplete="on"
        value={confirm}
        onChange={(e) => setConfirm(e.target.value)}
      />
      <input
        type="checkbox"
        onClick={() => setShowConfirmPassword(!showConfirmPassword)}
      />
    </div>
  );
}
