<div class="flex flex-col items-center mt-6">
    <img class="w-8 h-8" src="{{ $assetBase . '/assets/faq.png' }}" alt="FAQ">
    <h2 class="text-xl font-bold text-dark text-center mt-1">QnA</h2>
</div>

<div id="chatbox" class="h-80 overflow-y-auto border rounded-lg p-3 bg-gray-50 text-sm flex flex-col gap-2 shadow-md">
</div>

<div id="question" class="p-4 text-center max-w-full text-sm border border-gray-300 rounded-md bg-white cursor-pointer"
    onclick="document.getElementById('message').value = this.textContent; document.getElementById('message').focus();">
    Apa saja jurusannya?
</div>
<form id="chatForm" class="flex max-w-full mt-2 h-24">
    <textarea id="message" name="message" placeholder="Tulis pertanyaan kamu..." class="flex-grow border w-full rounded-l-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300
            resize-none overflow-y-auto text-sm" rows="1" required></textarea>

    <button id="submitBtn" type="submit" class="bg-blue-500 text-white px-4 rounded-r-lg hover:bg-blue-600 transition">
        Kirim
    </button>
</form>

<script>
const chatForm = document.getElementById('chatForm');
const chatbox = document.querySelector('#chatbox');
const messageInput = document.getElementById('message');
const submitButton = document.getElementById('submitBtn');

// Fungsi untuk mendapatkan atau membuat chat history
function getChatHistory() {
    const history = localStorage.getItem('skaribot_chat_history');
    const timestamp = localStorage.getItem('skaribot_chat_timestamp');

    // Cek jika history lebih dari 3 jam
    if (timestamp && (Date.now() - parseInt(timestamp)) > 3 * 60 * 60 * 1000) {
        localStorage.removeItem('skaribot_chat_history');
        localStorage.removeItem('skaribot_chat_timestamp');
        return [];
    }

    return history ? JSON.parse(history) : [];
}

// Fungsi untuk menyimpan chat history
function saveChatHistory(history) {
    localStorage.setItem('skaribot_chat_history', JSON.stringify(history));
    localStorage.setItem('skaribot_chat_timestamp', Date.now().toString());
}

// Fungsi untuk memuat history chat
function loadChatHistory() {
    const history = getChatHistory();
    chatbox.innerHTML = '';

    history.forEach(chat => {
        appendMessage(chat.sender, chat.text, false);
    });

    chatbox.scrollTop = chatbox.scrollHeight;
}

// Fungsi untuk membersihkan history otomatis
function cleanupOldHistory() {
    const timestamp = localStorage.getItem('skaribot_chat_timestamp');
    if (timestamp && (Date.now() - parseInt(timestamp)) > 3600000) {
        localStorage.removeItem('skaribot_chat_history');
        localStorage.removeItem('skaribot_chat_timestamp');
    }
}

messageInput.addEventListener('keydown', async (e) => {
    if (e.key === "Enter" || e.keyCode === 13) {
        e.preventDefault();
        await submitButton.click();
        setTimeout(() => {
            messageInput.value = '';
        }, 50);
    }
});

chatForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const message = messageInput.value.trim();
    if (!message) return;

    appendMessage('user', message);
    messageInput.value = '';

    const typingBubble = appendTyping();

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

    const data = await res.json();

    typingBubble.remove();
    appendMessage('bot', data.reply);
});

function appendMessage(sender, text, saveToHistory = true) {
    const div = document.createElement('div');
    div.classList.add('bubble', sender);
    div.innerHTML = text;
    chatbox.appendChild(div);
    chatbox.scrollTop = chatbox.scrollHeight;

    // Simpan ke history jika diperlukan
    if (saveToHistory) {
        const history = getChatHistory();
        history.push({
            sender,
            text,
            timestamp: Date.now()
        });
        saveChatHistory(history);
    }

    return div;
}

function appendTyping() {
    const typing = document.createElement('div');
    typing.classList.add('bubble', 'bot');
    typing.innerHTML = `<div class="typing"><span></span><span></span><span></span></div>`;
    chatbox.appendChild(typing);
    chatbox.scrollTop = chatbox.scrollHeight;
    return typing;
}

const questionElement = document.getElementById('question');
const questions = [
    "Apa saja jurusannya?",
    "Bagaimana cara mendaftar?",
    "Apa saja ekstrakurikuler yang ada?",
    "Apa jurusan yang paling banyak diminati?",
    "Dimana letak sekolahnya?",
    "Apa prestasi terbaik yang pernah diperoleh?",
    "Hubungkan saya dengan admin.",
    "Siapa kepala sekolahnya?",
    "Apa saja fasilitas yang ada di sekolah?",
    "Bagaimana lulusan sekolahnya?",
    "Apa visi dan misinya?",
    "Bagaimana sejarahnya?",
    "Terakreditasi apa sekolahnya?",
];

let currentQuestionIndex = 0;

questionElement.textContent = questions[currentQuestionIndex];

setInterval(() => {
    currentQuestionIndex = (currentQuestionIndex + 1) % questions.length;
    questionElement.textContent = questions[currentQuestionIndex];
}, 5000);

// Inisialisasi saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    cleanupOldHistory();
    loadChatHistory();
});
</script>
