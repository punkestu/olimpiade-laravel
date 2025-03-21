import { Editor } from "@tiptap/core";
import StarterKit from "@tiptap/starter-kit";
import { Image } from "@tiptap/extension-image";
import { MathExtension } from "@aarkue/tiptap-math-extension";
import Table from "@tiptap/extension-table";
import TableCell from "@tiptap/extension-table-cell";
import TableHeader from "@tiptap/extension-table-header";
import TableRow from "@tiptap/extension-table-row";
import TextAlign from "@tiptap/extension-text-align";
import katex from "katex";

import "katex/dist/katex.min.css";

export function setKatex() {
    document.querySelectorAll('[data-type="inlineMath"]').forEach((element) => {
        var content = element.textContent;
        if (content.startsWith("$")) {
            content = content.substring(1);
        }
        if (content.endsWith("$")) {
            content = content.substring(0, content.length - 1);
        }
        katex.render(content, element, {
            throwOnError: false,
        });
        element.removeAttribute("data-type");
    });
}

export function initRichText() {
    const CustomImage = Image.extend({
        addAttributes() {
            return {
                ...this.parent?.(),
                width: {
                    default: null,
                },
            };
        },
        renderHTML({ HTMLAttributes }) {
            const { width, src } = HTMLAttributes;
            return [
                "img",
                {
                    ...HTMLAttributes,
                    src,
                    style: `width: ${width}`,
                },
            ];
        },
    });
    document.querySelectorAll(".wysiwyg").forEach((element) => {
        const className = element.querySelector("#class").innerText;
        const editor = new Editor({
            element: element.querySelector("#editor"),
            extensions: [
                StarterKit,
                CustomImage,
                Table.configure({
                    resizable: true,
                }),
                TableRow,
                TableHeader,
                TableCell,
                TextAlign.configure({
                    types: ["heading", "paragraph"],
                }),
                MathExtension.configure({
                    inlineMath: {
                        delimiters: [
                            ["$", "$"],
                            ["\\(", "\\)"],
                        ],
                    },
                    displayMath: {
                        delimiters: [
                            ["$$", "$$"],
                            ["\\[", "\\]"],
                        ],
                    },
                }),
            ],
            editorProps: {
                attributes: {
                    name: "description",
                    class: `min-h-[20vh] max-h-[50vh] outline-none [&_ul]:pl-4 [&_ol]:pl-4 [&_ul]:list-disc [&_ol]:list-decimal overflow-y-auto ${className}`,
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
        element
            .querySelector("#formula-buffer")
            .addEventListener("change", (e) => {
                const formula = e.target.value;
                editor
                    .chain()
                    .focus()
                    .insertContent({
                        type: "inlineMath",
                        attrs: { latex: formula },
                    })
                    .run();
            });
        element.querySelector("#selectImage").addEventListener("click", (e) => {
            const path = element.querySelector(
                "#image-container [type=radio]:checked"
            ).value;
            editor
                .chain()
                .focus()
                .setImage({
                    src: `/storage/${path}`,
                    width: "80%",
                })
                .run();
        });
        element.querySelector("#add-table").addEventListener("click", () => {
            editor
                .chain()
                .focus()
                .insertTable({ rows: 3, cols: 3, withHeaderRow: true })
                .run();
        });
        element.querySelector("#add-row").addEventListener("click", () => {
            editor.chain().focus().addRowAfter().run();
        });
        element.querySelector("#add-column").addEventListener("click", () => {
            editor.chain().focus().addColumnAfter().run();
        });
        element.querySelector("#del-row").addEventListener("click", () => {
            editor.chain().focus().deleteRow().run();
        });
        element.querySelector("#del-column").addEventListener("click", () => {
            editor.chain().focus().deleteColumn().run();
        });
        element.querySelector("#alg-center").addEventListener("click", () => {
            editor.chain().focus().setTextAlign('center').run();
        });
        element.querySelector("#alg-justify").addEventListener("click", () => {
            editor.chain().focus().setTextAlign('justify').run();
        });
        editor.on("update", () => {
            const isEmpty =
                editor.state.doc.textContent.length === 0 &&
                editor.state.doc.content.content.length === 0;
            element.querySelector("#editor-content").value = isEmpty
                ? ""
                : editor.getHTML();
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
