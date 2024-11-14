import FormLogin from "./FormLogin";
import { describe, expect, it } from "vitest";
import { handleSubmit } from "./FormLogin";

describe("FormLogin", () => {
  it("should render", () => {
    expect(FormLogin).toBeDefined();
  });
});
