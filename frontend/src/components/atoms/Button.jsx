import React from "react";
import styled from "styled-components";

/**
 * to create a customizable button
 * @param text - the text content of the button
 * @param onClick - the function to be executed when the button is clicked
 * @param type - default is button
 * @param width
 * @param height - default 35px
 * @param backgroundColor
 * @param disabled - boolean indicating whether the button is disabled
 */

export default function Button({
  text,
  onClick,
  type = "button",
  width,
  height = 35,
  backgroundColor,
  disabled = false,
}) {
  return (
    <Container
      type={type}
      onClick={onClick}
      width={width}
      height={height}
      backgroundColor={backgroundColor}
      disabled={disabled}
    >
      {text}
    </Container>
  );
}

const Container = styled.button`
  width: ${(props) => (props.width ? `${props.width}%` : "")};
  height: ${(props) => props.height && `${props.height}px`};
  padding: 5px 10px;
  border-radius: 5px;
  background-color: ${(props) =>
    props.backgroundColor ? props.backgroundColor : `var(--color-black-light)`};
  color: var(--color-white);
  &:hover {
    filter: brightness(1.1);
  }
`;
