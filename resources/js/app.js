import "./bootstrap";
import Search from "./search";
import Chat from "./chat";

if (document.querySelector(".header-search-icon")) {
    new Search();
}

if (document.querySelector(".header-chat-icon")) {
    new Chat();
}
