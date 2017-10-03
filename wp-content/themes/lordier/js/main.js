
// Copy to clipboard example
document.querySelector(".copybtn").onclick = function() {
  // Select the content
  document.querySelector("h1").select();
  // Copy to the clipboard
  document.execCommand('copy');
};
