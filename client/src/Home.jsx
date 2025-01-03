import { Link } from "react-router";
import useAuth from "./hooks/useAuth";

function Home() {
  const { logoutUser, auth } = useAuth();
  return (
    <div>
      <ul>
        <li>
          <Link to="/login">Login</Link>
        </li>
        <li>
          <Link to="/signup">signup</Link>
        </li>
        <li>
          <button onClick={logoutUser}>logout</button>
          <button onClick={() => console.log(auth)}>show auth</button>
        </li>
      </ul>
    </div>
  );
}

export default Home;
