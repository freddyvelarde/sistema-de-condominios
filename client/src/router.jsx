import { createBrowserRouter } from "react-router-dom";
import Home from "./Home";
import Login from "./pages/Auth/Login";
import useAuth from "./hooks/useAuth";

const useRouter = () => {
  const { isAuth } = useAuth();
  const router = createBrowserRouter([
    {
      path: "/",
      // element: <Home />,
      element: isAuth ? (
        <Home />
      ) : (
        <span>Necesitar crear una cuenta or logearte</span>
      ),
    },
    { path: "/login", element: <Login /> },
  ]);
  return { router };
};

export default useRouter;
