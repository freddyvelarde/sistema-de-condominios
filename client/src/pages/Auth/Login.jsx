import { useState } from "react";
import useAuth from "../../hooks/useAuth";

const Login = () => {
  const { authUser } = useAuth();

  const [user, setUser] = useState({ ci: "", password: "" });
  // const [response, setResponse] = useState(null);

  // yo podria todos los endpoints en un archivo aparte global por si el servidor decide modificar los endpoints
  const url = "http://localhost:8000/api/login";

  // fetching data from serverxd
  const postRequestLogin = async (url) => {
    const req = await fetch(url, {
      method: "POST",
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ password: user.password, ci: user.ci }),
    });
    const response = await req.json();
    if (response && response.token) {
      authUser(response.token);
      console.log(response.token);
    } else {
      console.log(response);
    }
  };

  const handleonChangeCI = (e) => {
    setUser({ ...user, ci: e.target.value });
  };
  const handleonChangePassword = (e) => {
    setUser({ ...user, password: e.target.value });
  };
  const cleanInputs = () => {
    setUser({ ci: "", password: "" });
  };

  const handleOnSubmit = (e) => {
    e.preventDefault();
    postRequestLogin(url);
    cleanInputs();
  };

  return (
    <form onSubmit={handleOnSubmit}>
      <div>
        <label htmlFor="">Nombres</label>
        <input
          type="text"
          placeholder="CI"
          value={user.ci}
          onChange={handleonChangeCI}
        />
      </div>

      <div>
        <label htmlFor="">Nombres</label>
        <input
          type="password"
          placeholder="password"
          value={user.password}
          onChange={handleonChangePassword}
        />
      </div>
      <button>Login</button>
    </form>
  );
};

export default Login;
