const { GeminiGenAi } = requrei("@google/genai");
const gemini = new GeminiGenAi({apiKey: process.env.GEMINI_API_KEY});

async function geminiAi({
    prompt,
    instruksi = null,
    temperature = 0.1,
    isWebSearch = false,
    model = "gemini-2.5-flash",
}) {
    try {
        const groundingTool = { googleSearch: {} };

        const config = {
            systemInstruction: instruksi,
            temperature: temperature,
        };

        if(isWebSearch) {
            config.tools = [groundingTool];
        };

        const response = await gemini.models.generateContent({
            model: model,
            contents: [{ role: "user", parts: [{ text: prompt }] }],
            config: config,
        });

        return response.text;
    } catch (e) {
        console.error("Error Found: ", e);
        return null;
    }
}

module.exports = geminiAi;