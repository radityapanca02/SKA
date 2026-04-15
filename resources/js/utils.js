// Common utility functions for the application

// Chat functionality
const CHAT_HISTORY_KEY = 'skaribot_chat_history';
const CHAT_TIMESTAMP_KEY = 'skaribot_chat_timestamp';
const CHAT_EXPIRE_TIME = 3 * 60 * 60 * 1000;

export function getChatHistory() {
    const timestamp = localStorage.getItem(CHAT_TIMESTAMP_KEY);
    if (timestamp && (Date.now() - parseInt(timestamp)) > CHAT_EXPIRE_TIME) {
        clearChatHistory();
        return [];
    }
    const history = localStorage.getItem(CHAT_HISTORY_KEY);
    return history ? JSON.parse(history) : [];
}

export function saveChatHistory(history) {
    localStorage.setItem(CHAT_HISTORY_KEY, JSON.stringify(history));
    localStorage.setItem(CHAT_TIMESTAMP_KEY, Date.now().toString());
}

export function clearChatHistory() {
    localStorage.removeItem(CHAT_HISTORY_KEY);
    localStorage.removeItem(CHAT_TIMESTAMP_KEY);
}

export function scrollToBottom(element) {
    element.scrollTo({
        top: element.scrollHeight,
        behavior: 'smooth'
    });
}

export function resizeTextarea(textarea, maxHeight = 120) {
    textarea.style.height = 'auto';
    const newHeight = textarea.scrollHeight;
    textarea.style.height = newHeight + 'px';
    textarea.style.overflowY = newHeight > maxHeight ? 'auto' : 'hidden';
}

// Throttle utility
export function throttle(func, limit) {
    let inThrottle;
    return function(...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Debounce utility
export function debounce(func, wait) {
    let timeout;
    return function(...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), wait);
    };
}
