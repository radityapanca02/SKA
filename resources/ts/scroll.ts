export function initScrollButtons(): void {
    const buttons = document.querySelectorAll<HTMLButtonElement>(".btn-pend");
    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            const targetId = button.getAttribute("data-target");
            const target = document.getElementById(targetId!);
            if (target) {
                target.scrollIntoView({ behavior: "smooth", block: "start" });
            }
        });
    });
}
