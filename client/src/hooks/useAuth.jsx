import { useDispatch } from "react-redux";
import { setAuthValue } from "../redux/slices/authSlice";
import { useEffect } from "react";

import { useSelector } from "react-redux";

const useAuth = () => {
  const auth = useSelector((state) => state.auth.value);
  const dispatch = useDispatch();

  useEffect(() => {
    localStorage.setItem("auth", JSON.stringify(auth));
  }, [auth]);

  const authUser = (token) => {
    dispatch(setAuthValue({ isAuth: true, token }));
  };
  const logoutUser = () => {
    dispatch(setAuthValue({ isAuth: false, token: "" }));
  };
  return { isAuth: auth.isAuth, token: auth.token, authUser, logoutUser, auth };
};

export default useAuth;
