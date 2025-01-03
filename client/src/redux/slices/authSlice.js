import { createSlice } from "@reduxjs/toolkit";

const storedToken = localStorage.getItem("auth");
const initialValue = storedToken
  ? JSON.parse(storedToken)
  : { isAuth: false, token: "" };

const authSlice = createSlice({
  name: "theme",
  initialState: {
    value: initialValue,
  },
  reducers: {
    setAuthValue: (state, actions) => {
      state.value = actions.payload;
    },
  },
});

export const { setAuthValue } = authSlice.actions;
export default authSlice.reducer;
