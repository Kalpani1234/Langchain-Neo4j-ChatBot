const sendButton = document.getElementById('sendButton');
const userInput = document.getElementById('userInput');
const messages = document.getElementById('messages');

function appendMessage(text, isUser) {
  const li = document.createElement('li');
  li.className = isUser
    ? 'max-w-2xl ms-auto flex justify-end gap-x-2'
    : 'flex gap-x-2';
  li.innerHTML = isUser
    ? `<div class="grow text-end space-y-3">
             <div class="inline-block bg-blue-600 rounded-lg p-4 shadow-2xs">
               <p class="text-sm text-white">${text}</p>
             </div>
           </div>
           <span class="shrink-0 inline-flex items-center justify-center size-9.5 rounded-full bg-gray-600">
             <span class="text-sm font-medium text-white">You</span>
           </span>`
    : `<span class="shrink-0 inline-flex items-center justify-center size-9.5 rounded-full bg-gray-600">
          <span class="text-sm font-medium text-white">AI</span>
        </span>
           <div class="grow max-w-[90%] md:max-w-2xl w-full space-y-3">
             <div class="inline-block bg-white border border-gray-200 rounded-lg p-4 dark:bg-neutral-900 dark:border-neutral-700">
               <p class="text-sm text-gray-800 dark:text-white">${text}</p>
             </div>
           </div>`;
  messages.appendChild(li);
  messages.scrollTop = messages.scrollHeight;
}

sendButton.addEventListener('click', async () => {
  const text = userInput.value.trim();
  if (!text) return;
  appendMessage(text, true);
  userInput.value = '';

  try {
    const res = await fetch('http://localhost:8000/query', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ query: text })
    });
    if (!res.ok) {
      const err = await res.text();
      throw new Error(err || res.statusText);
    }
    const { response } = await res.json();
    appendMessage(response, false);
  } catch (e) {
    console.error(e);
    appendMessage('Error fetching AI response.', false);
  }
});