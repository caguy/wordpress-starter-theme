// Loads polyfills only if needed and delays the app execution while not loaded.
// All polyfilled are loaded when at least one needed feature is missing.
// Polyfills are loaded via a <script> tag pointing to a remote polyfill (from polyfill.io for exemple)
// Condition tests the required features (exemple: Array.from && Object.assign)
// PolyfillUrl is the polyfill URL to load (exemple: https://polyfill.io/v3/polyfill.min.js?features=Array.from)

function polyfill(func, condition, polyfillUrl) {
  if (!condition) {
    return () => {
      const polyfillElt = document.createElement("script");
      polyfillElt.src = polyfillUrl;
      polyfillElt.async = false;
      polyfillElt.id = "polyfillLoader";
      polyfillElt.onload = () => {
        func();
      };
      document.body.appendChild(polyfillElt);
    };
  } else {
    return () => {
      func();
    };
  }
}

export default polyfill;
