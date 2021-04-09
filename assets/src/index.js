import "normalize.css";
import "./css/index.scss";

import polyfill from "./js/utils/polyfill";
import main from "./js/main";

const polyfilledMain = polyfill(
  main,
  true, // <-- List here the features to polyfill
  "" // <-- Insert the URL of a polyfill bundle from polyfill.io
);

polyfilledMain();
