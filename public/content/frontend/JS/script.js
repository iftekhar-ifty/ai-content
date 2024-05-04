// Output Depth & Length
const outputDepth = document.getElementById("output-depth");
const outputDepthValue = document.getElementById("output-depth-value");

// Update the paragraph text with the current value of the range input
outputDepth.addEventListener("input", function () {
  outputDepth.style.setProperty("--range-value", outputDepth.value + "%");
  outputDepthValue.textContent = outputDepth.value;
  outputDepthValue.style.left = outputDepth.value + "%";
});

// User Icon Dropdown hide when click user icon
const userIconBtn = document.getElementById("user_icon_btn");
const userInfo = document.getElementById("user_info_container");

userIconBtn.addEventListener("click", () => {
  userInfo.classList.toggle("!block");
});
window.addEventListener("click", (e) => {
  if (!userIconBtn.contains(e.target)) {
    userInfo.classList.remove("!block");
  }
});

// Text copy
const copyTextContent = document.getElementById("copy_text_content");
const copyTextSuccess = document.getElementById("copy_text_success");
const copyTextBtn = document.getElementById("copy_text_btn");

copyTextBtn.addEventListener("click", () => {
  const range = document.createRange();
  range.selectNode(copyTextContent);
  window.getSelection().addRange(range);
  document.execCommand("copy");
  window.getSelection().removeAllRanges();
  copyTextSuccess.classList.add("!block");
  setTimeout(() => {
    copyTextSuccess.classList.remove("!block");
  }, 2000);
});
