import Button from "./components/atoms/Button.jsx";
import StyledPadding from "./components/atoms/StyledPadding.jsx";

function App() {
  return (
    <>
      <StyledPadding height={15} />
      <Button text="Test 1" onClick={() => console.log("Hello!")}></Button>
      <StyledPadding height={15} />
      <Button text="Test 2" onClick={() => console.log("Hello!")}></Button>
    </>
  );
}

export default App;
