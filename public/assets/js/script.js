if(document.getElementById("video")) {
  document.getElementById("video").onchange = function() {
    document.getElementById("form").submit();
  };
}

if(document.getElementById("like")) {
  document.getElementById("like").onclick = function() {
    document.getElementById("like").value = 1;
    document.getElementById("dislike").value = 0;
  };
}

if(document.getElementById("dislike")) {
  document.getElementById("dislike").onclick = function() {
    document.getElementById("dislike").value = 2;
    document.getElementById("like").value = 0;
  };
}