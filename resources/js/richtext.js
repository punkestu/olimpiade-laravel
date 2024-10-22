import { Editor } from "@tiptap/core";
import StarterKit from "@tiptap/starter-kit";

export function initRichText() {
    document.querySelectorAll(".wysiwyg").forEach((element) => {
        const className = element.querySelector("#class").innerText;
        const editor = new Editor({
            element: element.querySelector("#editor"),
            extensions: [StarterKit],
            editorProps: {
                attributes: {
                    name: "description",
                    class: `min-h-[20vh] max-h-[25vh] outline-none [&_ul]:pl-4 [&_ol]:pl-4 [&_ul]:list-disc [&_ol]:list-decimal overflow-y-auto ${className}`,
                },
            },
        });
        element
            .querySelector("#toggleBoldButton")
            .addEventListener("click", () => {
                editor.chain().focus().toggleBold().run();
            });
        element
            .querySelector("#toggleItalicButton")
            .addEventListener("click", () => {
                editor.chain().focus().toggleItalic().run();
            });
        element
            .querySelector("#toggleListButton")
            .addEventListener("click", () => {
                editor.chain().focus().toggleBulletList().run();
            });
        element
            .querySelector("#toggleOrderedListButton")
            .addEventListener("click", () => {
                editor.chain().focus().toggleOrderedList().run();
            });
        editor.on("update", () => {
            const isEmpty = editor.state.doc.textContent.length === 0;
            element.querySelector("#editor-content").value = isEmpty ? "" : editor.getHTML();
        });
        editor.commands.setContent(
            element.querySelector("#editor-content").value
        );
        element.querySelector("#editor-content").onchange = () => {
            editor.commands.setContent(
                element.querySelector("#editor-content").value
            );
        };
    });
}
