require('dotenv').config();
const express = require("express");
const cors = require("cors");
const geminiAi = require("./apiGemini");

const app = express();
app.use(cors());
app.use(express.json());

app.post('/api/gemini', async (req, res) => {
    const { keywoard } = req.body;

    if(!keywoard) {
        return res.status(400).json({ error: "Keywoard Kosong!" });
    };

    const prompt = `
    User memberikan minat: "${keywoard}".
    Tugasmu adalah merekomendasikan jurusan SMK yang paling sesuai dari daftar jurusan berikut:
    - RPL (Rekayasa Perangkat Lunak) -> fokus coding, software, aplikasi
    - DKV (Desain Komunikasi Visual) -> fokus desain grafis, multimedia

    Jawab dalam format JSON seperti ini:
    {
        "name:" "Nama Jurusan",
        "departement: "Kategori",
        "description": "Alasan singkat kenapa cocok",
    }
    `;

    const result = await geminiAi({
        prompt,
        instruksi: "Kamu adalah AI Asisten yang membantu calon siswa memilih jurusan SMK yang sesuai",
    });

    try {
        const parsed = JSON.parse(result);
        return res.json(parsed);
    } catch (e) {
        return res.json({ raw: result });
    }

    app.listen(process.env.PORT || 5000, () => {
        console.log(`Backend Server Running at http://localhost:${process.env.PORT}`)
    }) 
});