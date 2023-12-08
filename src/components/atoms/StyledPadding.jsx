import React from "react";
import styled from "styled-components";

/**
 * to create a styled `div` with specified padding
 * @param width
 * @param height
 */

export default function StyledPadding({ width, height }) {
  return <PaddingContainer width={width} height={height} />;
}

const PaddingContainer = styled.div`
  width: ${(props) => props.width && `${props.width}px`};
  height: ${(props) => props.height && `${props.height}px`};
`;
