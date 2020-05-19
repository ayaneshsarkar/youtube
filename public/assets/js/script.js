document.getElementById("video").onchange = function() {
  document.getElementById("form").submit();
};

document.getElementById("like").onclick = function() {
  document.getElementById("like").value = 1;
  document.getElementById("dislike").value = 0;
};
document.getElementById("dislike").onclick = function() {
  document.getElementById("dislike").value = 2;
  document.getElementById("like").value = 0;
};

