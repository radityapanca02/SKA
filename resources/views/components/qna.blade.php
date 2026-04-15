<div id="chatContainer" class="flex flex-col h-full overflow-hidden">
    <div id="chatbox" class="flex-1 min-h-0 w-full p-4 bg-[#f8fafc] overflow-y-auto flex flex-col gap-3">
    </div>

    <div class="flex-shrink-0 bg-white border-t border-gray-100 p-3">
        <div id="question" class="w-full p-2 mb-2 text-center text-xs border border-blue-200 rounded-lg bg-blue-50 text-blue-700
                    cursor-pointer hover:bg-blue-100 transition-all border-dashed duration-300"
            onclick="putQuestion()">
            Memuat pertanyaan...
        </div>

        <form id="chatForm" class="flex items-stretch gap-0">
            <textarea id="message" name="message" placeholder="Tulis pertanyaan..."
                class="flex-grow border border-gray-300 rounded-l-xl px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-300 resize-none text-sm transition-[height] duration-200 ease-in-out"
                rows="1" style="height: 42px; max-height: 120px; overflow-y: hidden;" required></textarea>

            <button id="submitBtn" type="submit"
                class="bg-blue-600 text-white px-5 rounded-r-xl hover:bg-blue-700 active:scale-95 transition-all flex items-center justify-center shadow-sm min-w-[55px]">
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
</div>

<style>
#message {
    transition: height 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    line-height: 1.5;
}

#message::-webkit-scrollbar {
    width: 4px;
}

#message::-webkit-scrollbar-thumb {
    background: #cbd5e1;
    border-radius: 10px;
}

.opacity-0 {
    opacity: 0;
    transform: translateY(-5px);
}

#question {
    transition: all 0.3s ease-in-out;
}
</style>

<script>
const chatForm = document.getElementById('chatForm');
const chatbox = document.querySelector('#chatbox');
const messageInput = document.getElementById('message');
const questionElement = document.getElementById('question');

function resizeTextarea() {
    messageInput.style.overflowY = 'hidden';

    messageInput.style.height = 'auto';

    let scHeight = messageInput.scrollHeight;

    if (scHeight <= 42) {
        messageInput.style.height = '42px';
    } else if (scHeight >= 120) {
        messageInput.style.height = '120px';
        messageInput.style.overflowY = 'auto';
    } else {
        messageInput.style.height = scHeight + 'px';
    }
}

messageInput.addEventListener('input', resizeTextarea);

function putQuestion() {
    const text = questionElement.textContent.trim();
    messageInput.value = text;

    setTimeout(() => {
        resizeTextarea();
        messageInput.focus();
    }, 50);
}

chatForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const message = messageInput.value.trim();
    if (!message) return;

    appendMessage('user', message);

    messageInput.value = '';
    resizeTextarea();

    const typingBubble = appendTyping();

    try {
        const res = await fetch("{{ route('chat.ask') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                message
            })
        });

        if (!res.ok) throw new Error("Server Error");

        const data = await res.json();
        typingBubble.remove();
        appendMessage('bot', data.reply);
    } catch (err) {
        typingBubble.remove();
        appendMessage('bot', "Maaf, ada gangguan koneksi. Coba lagi ya!");
        console.error(err);
    }
});

messageInput.addEventListener('keydown', (e) => {
    if (e.key === "Enter" && !e.shiftKey) {
        e.preventDefault();
        chatForm.dispatchEvent(new Event('submit'));
    }
});

function scrollToBottom() {
    chatbox.scrollTo({
        top: chatbox.scrollHeight,
        behavior: 'smooth'
    });
}

function appendMessage(sender, text) {
    const div = document.createElement('div');
    div.classList.add('bubble', sender);
    div.innerHTML = text;
    chatbox.appendChild(div);
    scrollToBottom();
}

function appendTyping() {
    const typing = document.createElement('div');
    typing.classList.add('bubble', 'bot');
    typing.innerHTML = `<div class="typing"><span></span><span></span><span></span></div>`;
    chatbox.appendChild(typing);
    scrollToBottom();
    return typing;
}

const questions = [
    "Apa saja jurusannya?",
    "Bagaimana cara mendaftar?",
    "Dimana letak sekolahnya?",
    "Fasilitas sekolah apa saja?",
    "Apa visi dan misinya?",
    "Ekskulnya ada apa saja?"
];
let currentQuestionIndex = 0;

setInterval(() => {
    questionElement.classList.add('opacity-0');
    setTimeout(() => {
        currentQuestionIndex = (currentQuestionIndex + 1) % questions.length;
        questionElement.textContent = questions[currentQuestionIndex];
        questionElement.classList.remove('opacity-0');
    }, 300);
}, 4000);

document.addEventListener('DOMContentLoaded', () => {
    questionElement.textContent = questions[0];
});
</script>
