const comments = document.getElementById("comments");
const commentsList = document.getElementById("commentsList");
const comment = document.getElementsByClassName("card-comment");
console.log(commentsList);

// Comments A tagına tıkladığında
comments.addEventListener("click", () => {
    // Yorum listesini açıp kapama
    commentsList.classList.toggle("open-comments");
    // Her bir yorum
    for (let item of comment) {
        item.classList.toggle("open-comment");
    }
});
