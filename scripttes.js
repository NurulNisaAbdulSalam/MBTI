const questions = [
    // pertanyaan dari diri ku ambil
    {
        question: "1. Anda lebih suka menghabiskan waktu sendirian atau bersama orang lain?",
        answer: "Ya" // Introvert
    },
    {
        question: "2. Anda lebih suka melihat gambaran besarnya atau fokus pada detail?",
        answer: "Tidak" // Sensing
    },
    {
        question: "3. Anda lebih sering mengambil keputusan berdasarkan logika atau perasaan?",
        answer: "Ya" // Thinking
    },
    {
        question: "4. Anda lebih suka merencanakan segala sesuatu atau bersikap spontan?",
        answer: "Tidak" // Perceiving
    },
    {
        question: "5. Anda lebih suka berfokus pada ide-ide baru atau pada hal-hal yang sudah terbukti?",
        answer: "Ya" // Intuition
    },
    {
        question: "6. Anda lebih suka menjaga keharmonisan atau mengatakan apa yang Anda pikirkan?",
        answer: "Tidak" // Thinking
    },
    {
        question: "7. Anda lebih suka bekerja dengan jadwal yang terstruktur atau fleksibel?",
        answer: "Ya" // Judging
    },
    {
        question: "8. Anda lebih suka mengambil inisiatif atau mengikuti instruksi?",
        answer: "Tidak" // Perceiving
    },
    {
        question: "9. Anda lebih suka menghabiskan energi dengan orang lain atau sendirian?",
        answer: "Ya" // Extrovert
    },
    {
        question: "10. Anda lebih suka membuat keputusan berdasarkan fakta atau perasaan?",
        answer: "Tidak" // Feeling
    }
];


const mbtiDescriptions = {
    "ISTJ": "ISTJ adalah individu yang cenderung praktis, detail-oriented, realistis, dan bertanggung jawab. Mereka cenderung lebih suka bekerja secara independen atau dalam struktur yang jelas dan terorganisir. - Kamu Lebih suka bekerja sendiri atau dalam kelompok kecil, dan membutuhkan waktu sendiri untuk memulihkan energi. - Kamu lebih fokus pada fakta dan detail konkret, serta cenderung praktis dan realistis. - Membuat keputusan berdasarkan logika dan objektivitas, bukan perasaan pribadi. -Menyukai rencana yang terstruktur dan lebih suka memiliki kontrol atas lingkungan mereka. Hal yang Tidak Disukai ISTJ :1. Ketidakpastian dan perubahan mendadak. 2. Situasi yang tidak terorganisir atau tidak teratur.3. Orang yang tidak dapat diandalkan atau tidak bertanggung jawab. 4. Pekerjaan yang tidak memiliki tujuan yang jelas atau tidak memberikan hasil nyata. Hal yang Disukai ISTJ : 1. Struktur dan rutinitas yang jelas. 2. Pekerjaan yang memungkinkan mereka menggunakan keterampilan analitis dan logika. 3. Kesempatan untuk menyelesaikan tugas dan mencapai tujuan. 4. Lingkungan yang tenang dan terorganisir. Saran Pekerjaan yang Cocok untuk ISTJ :#Akuntan: Menyukai detail dan struktur. #Inspektur Kualitas: Memeriksa dan memastikan standar dipenuhi. #Administrator: Mengelola operasi sehari-hari dengan efisien. #Manajer Proyek: Mengorganisir dan mengawasi proyek dengan baik. #Polisi atau Anggota Militer: Menjalankan tugas dengan disiplin dan kepatuhan terhadap aturan. ISTJ dikenal sebagai “The Inspector” atau “The Logistician”. Kamu sering dihormati karena etos kerja kamu yang kuat, perhatian terhadap detail, dan keandalan. Kamu adalah tipe yang bisa diandalkan untuk menyelesaikan tugas tepat waktu dan sesuai standar yang tinggi. Meskipun ISTJ mungkin tampak kaku dan kurang fleksibel, Kamu adalah individu yang sangat setia dan dapat diandalkan dalam lingkungan yang terstruktur dan jelas.",
    "ISTP": "ISTP adalah individu yang mandiri, praktis, dan realistis, suka memecahkan masalah dengan pendekatan logis dan analitis. Ciri-ciri Karakter: -Introverted (I): Lebih suka bekerja sendiri. -Sensing (S): Fokus pada fakta dan detail nyata. -Thinking (T): Membuat keputusan berdasarkan logika. -Perceiving (P): Fleksibel dan spontan.  Hal yang Tidak Disukai: -Rutinitas yang membosankan. -Aturan yang terlalu kaku. -Situasi yang tidak memungkinkan kreativitas. -Hal yang Disukai -Kebebasan dan otonomi. -Memecahkan masalah teknis. -Aktivitas fisik atau pekerjaan tangan. Saran Pekerjaan yang Cocok: #Mekanik #nsinyur #Detektif #Pekerja lapangan",
    "INTJ": "INTJ adalah individu yang mandiri, berorientasi pada visi, dan strategis, sering disebut sebagai “The Architect”. Ciri-ciri Karakter: -Introverted (I): Lebih suka bekerja sendiri. -Intuitive (N): Fokus pada gambaran besar dan kemungkinan. -Thinking (T): Membuat keputusan berdasarkan logika. -Judging (J): Menyukai struktur dan rencana. Hal yang Tidak Disukai: -Ketidakmampuan orang lain. -Lingkungan yang tidak efisien. -Situasi yang tidak memungkinkan perencanaan jangka panjang. Hal yang Disukai: -Perencanaan strategis. -Proyek yang menantang intelektual. -Kebebasan untuk mengimplementasikan ide. Saran Pekerjaan yang Cocok: #Ilmuwan #Insinyur #Pengusaha #Manajer Strategi",
    "INTP": "INTP (Introversion, Intuition, Thinking, Perceiving) INTP adalah individu yang analitis, inovatif, dan logis, sering disebut sebagai “The Thinker”. Ciri-ciri Karakter: -Introverted (I): Lebih suka bekerja sendiri. -Intuitive (N): Fokus pada kemungkinan dan ide abstrak. -Thinking (T): Membuat keputusan berdasarkan logika.-Perceiving (P): Fleksibel dan spontan. Hal yang Tidak Disukai: -Rutinitas dan monoton. -Aturan yang tidak masuk akal. -Tugas yang terlalu praktis dan membosankan. Hal yang Disukai: -Pemecahan masalah teoritis. -Kebebasan intelektual. -Diskusi ide-ide abstrak. Saran Pekerjaan yang Cocok: #Ilmuwan #Pengembang perangkat lunak #Profesor #Penulis teknis",
    "ENTJ": "INTJ adalah individu yang mandiri, berorientasi pada visi, dan strategis, sering disebut sebagai “The Architect”. Ciri-ciri Karakter: -Introverted (I): Lebih suka bekerja sendiri. -Intuitive (N): Fokus pada gambaran besar dan kemungkinan. -Thinking (T): Membuat keputusan berdasarkan logika. -Judging (J): Menyukai struktur dan rencana. Hal yang Tidak Disukai: -Ketidakmampuan orang lain. -Lingkungan yang tidak efisien. -Situasi yang tidak memungkinkan perencanaan jangka panjang. Hal yang Disukai: -Perencanaan strategis. -Proyek yang menantang intelektual. -Kebebasan untuk mengimplementasikan ide. Saran Pekerjaan yang Cocok: #Ilmuwan #Insinyur #Pengusaha #Manajer Strategi.",
    "ENTP": "ENTP (Extraversion, Intuition, Thinking, Perceiving) ENTP adalah individu yang inovatif, energik, dan berpikiran terbuka, sering disebut sebagai “The Debater”. Ciri-ciri Karakter: -Extraverted (E): Energik dan suka berinteraksi dengan orang lain. -Intuitive (N): Fokus pada kemungkinan dan ide-ide baru. -Thinking (T): Membuat keputusan berdasarkan logika. -Perceiving (P): Fleksibel dan spontan. Hal yang Tidak Disukai: -Rutinitas dan monoton. -Aturan yang terlalu kaku. -Situasi yang membatasi kreativitas. Hal yang Disukai: -Ide-ide baru dan inovatif. -Diskusi dan debat. -Proyek yang menantang dan beragam. Saran Pekerjaan yang Cocok: #Pengusaha #Penulis #Pengacara #Penasihat Strategi",
    "INFJ": "INFJ (Introversion, Intuition, Feeling, Judging) INFJ adalah individu yang idealis, intuitif, dan peduli, sering disebut sebagai “The Advocate”. Ciri-ciri Karakter: -Introverted (I): Lebih suka bekerja sendiri. -Intuitive (N): Fokus pada gambaran besar dan kemungkinan. -Feeling (F): Membuat keputusan berdasarkan perasaan dan nilai pribadi. -Judging (J): Menyukai struktur dan rencana. Hal yang Tidak Disukai: -Konflik dan ketidakadilan. -Lingkungan yang tidak harmonis. -Ketidakpekaan terhadap perasaan orang lain. Hal yang Disukai: -Membantu orang lain. -Menyelesaikan masalah sosial. -Lingkungan yang harmonis dan peduli. Saran Pekerjaan yang Cocok: #Konselor #Psikolog #Guru #Penulis",
    "INFP": "INFP (Introversion, Intuition, Feeling, Perceiving) INFP adalah individu yang idealis, sensitif, dan kreatif, sering disebut sebagai “The Mediator”. Ciri-ciri Karakter: -Introverted (I): Lebih suka bekerja sendiri. -Intuitive (N): Fokus pada kemungkinan dan ide abstrak. -Feeling (F): Membuat keputusan berdasarkan perasaan dan nilai pribadi. -Perceiving (P): Fleksibel dan spontan. Hal yang Tidak Disukai -Konflik dan ketidakadilan.-Rutinitas dan pekerjaan yang monoton.-Situasi yang tidak memungkinkan ekspresi diri. Hal yang Disukai: -Kreativitas dan ekspresi diri.-Membantu orang lain. -Lingkungan yang harmonis dan bebas. Saran Pekerjaan yang Cocok: #Penulis #Konselor #Artis #Desainer",
    "ENFJ": "INFJ (Introversion, Intuition, Feeling, Judging) INFJ adalah individu yang idealis, intuitif, dan peduli, sering disebut sebagai “The Advocate”. Ciri-ciri Karakter: -Introverted (I): Lebih suka bekerja sendiri. -Intuitive (N): Fokus pada gambaran besar dan kemungkinan. -Feeling (F): Membuat keputusan berdasarkan perasaan dan nilai pribadi. -Judging (J): Menyukai struktur dan rencana. Hal yang Tidak Disukai: -Konflik dan ketidakadilan. -Lingkungan yang tidak harmonis. -Ketidakpekaan terhadap perasaan orang lain. Hal yang Disukai: -Membantu orang lain. -Menyelesaikan masalah sosial. -Lingkungan yang harmonis dan peduli. Saran Pekerjaan yang Cocok: #Konselor #Psikolog #Guru #Penulis",
    "ENFP": "INFP (Introversion, Intuition, Feeling, Perceiving) INFP adalah individu yang idealis, sensitif, dan kreatif, sering disebut sebagai “The Mediator”. Ciri-ciri Karakter: -Introverted (I): Lebih suka bekerja sendiri. -Intuitive (N): Fokus pada kemungkinan dan ide abstrak. -Feeling (F): Membuat keputusan berdasarkan perasaan dan nilai pribadi. -Perceiving (P): Fleksibel dan spontan. Hal yang Tidak Disukai -Konflik dan ketidakadilan.-Rutinitas dan pekerjaan yang monoton.-Situasi yang tidak memungkinkan ekspresi diri. Hal yang Disukai: -Kreativitas dan ekspresi diri.-Membantu orang lain. -Lingkungan yang harmonis dan bebas. Saran Pekerjaan yang Cocok: #Penulis #Konselor #Artis #Desainer.",
    "ISTJ": "ISTJ adalah individu yang cenderung praktis, detail-oriented, realistis, dan bertanggung jawab. Mereka cenderung lebih suka bekerja secara independen atau dalam struktur yang jelas dan terorganisir. - Kamu Lebih suka bekerja sendiri atau dalam kelompok kecil, dan membutuhkan waktu sendiri untuk memulihkan energi. - Kamu lebih fokus pada fakta dan detail konkret, serta cenderung praktis dan realistis. - Membuat keputusan berdasarkan logika dan objektivitas, bukan perasaan pribadi. -Menyukai rencana yang terstruktur dan lebih suka memiliki kontrol atas lingkungan mereka. Hal yang Tidak Disukai ISTJ :1. Ketidakpastian dan perubahan mendadak. 2. Situasi yang tidak terorganisir atau tidak teratur.3. Orang yang tidak dapat diandalkan atau tidak bertanggung jawab. 4. Pekerjaan yang tidak memiliki tujuan yang jelas atau tidak memberikan hasil nyata. Hal yang Disukai ISTJ : 1. Struktur dan rutinitas yang jelas. 2. Pekerjaan yang memungkinkan mereka menggunakan keterampilan analitis dan logika. 3. Kesempatan untuk menyelesaikan tugas dan mencapai tujuan. 4. Lingkungan yang tenang dan terorganisir. Saran Pekerjaan yang Cocok untuk ISTJ :#Akuntan: Menyukai detail dan struktur. #Inspektur Kualitas: Memeriksa dan memastikan standar dipenuhi. #Administrator: Mengelola operasi sehari-hari dengan efisien. #Manajer Proyek: Mengorganisir dan mengawasi proyek dengan baik. #Polisi atau Anggota Militer: Menjalankan tugas dengan disiplin dan kepatuhan terhadap aturan. ISTJ dikenal sebagai “The Inspector” atau “The Logistician”. Kamu sering dihormati karena etos kerja kamu yang kuat, perhatian terhadap detail, dan keandalan. Kamu adalah tipe yang bisa diandalkan untuk menyelesaikan tugas tepat waktu dan sesuai standar yang tinggi. Meskipun ISTJ mungkin tampak kaku dan kurang fleksibel, Kamu adalah individu yang sangat setia dan dapat diandalkan dalam lingkungan yang terstruktur dan jelas.",
    "ISFJ": "Anda adalah tipe yang hangat, peduli dan bertanggung jawab. Anda memiliki sifat yang hangat, peduli, dan suka membantu orang lain.",
    "ESTJ": "Anda adalah tipe yang terorganisir, logis, dan efisien. Anda mimiliki kemampuan kepemimpinan yang efektif, pendekatan yang logis dan praktis, dan fokus pada hasil dan efisien.",
    "ESFJ": "Anda adalah tipe yang hangat, peduli, dan kooperatif. Anda memiliki kemampuan untuk terhubung dengan orang lain , membangun hubungan yang harmois, dan menciptakan lingkungan yang kooperatif.",
    "ISTP": "Anda adalah tipe yang mandiri, praktis, dan pandai memecahkan masalah. Anda membawa keterampilan dan keahlian ke dalam lingkungan dan selalu dapat di andalkan untuk menyelesaikan tugas dengan baik.",
    "ISFP": "Anda adalah tipe yang kreatif, bebas, dan empati. Anda membawa semangat dan kreatifitas ke dalam lingkungan dan selalu ingin mengalami hal-hal baru.",
    "ESTP": "Anda adalah tipe yang dinamis, persuatif, dan beriorientasi pada tindakan. Anda membawa semangat dan energi ke dalam lingkungan dan selalu siap menghadapi tantangan baru.",
    "ESFP": "Anda adalah tipe yang ceria, spontan, dan penuh semangat. Anda membawa kebahagiaan dan keceriaaan bagi orang lain di sekitar.",
};


const quizContainer = document.getElementById("quizContainer");
const yesBtn = document.getElementById("yesBtn");
const noBtn = document.getElementById("noBtn");
const resultDiv = document.getElementById("result");
const resultText = document.getElementById("resultText");
const resultDescription = document.getElementById("resultDescription");
const progressBar = document.getElementById("progress");
const resetBtn = document.getElementById("resetBtn");

let currentQuestion = 0;
let answers = [];

function displayQuestion() {
    const { question } = questions[currentQuestion];
    const questionDiv = document.createElement("div");
    questionDiv.textContent = question;

    quizContainer.innerHTML = "";
    quizContainer.appendChild(questionDiv);

    updateProgressBar();
}

function handleAnswer(isYes) {
    answers[currentQuestion] = isYes;
    currentQuestion++;

    if (currentQuestion < questions.length) {
        displayQuestion();
    } else {
        showResult();
    }
}

function showResult() {
    quizContainer.innerHTML = "";
    yesBtn.disabled = true;
    noBtn.disabled = true;
    calculateResult();
    resultDiv.classList.remove("hidden");
}  

function calculateResult() {
    let introvertScore = 0;
    let sensingScore = 0;
    let thinkingScore = 0;
    let judgingScore = 0;   

    for (let i = 0; i < answers.length; i++) {
        if (i === 0 && answers[i]) introvertScore++;
        else if (i === 1 && !answers[i]) sensingScore++;
        else if (i === 2 && answers[i]) thinkingScore++;
        else if (i === 3 && !answers[i]) judgingScore++;
        else if (i === 4 && answers[i]) introvertScore++;
        else if (i === 5 && !answers[i]) thinkingScore++;
        else if (i === 6 && answers[i]) judgingScore++;
        else if (i === 7 && !answers[i]) judgingScore++;
        else if (i === 8 && answers[i]) introvertScore++;
        else if (i === 9 && !answers[i]) thinkingScore++;
    }

    let result = "";
    if (introvertScore >= 3) result += "I";
    else result += "E";

    if (sensingScore >= 1) result += "S";
    else result += "N";

    if (thinkingScore >= 2) result += "T";
    else result += "F";

    if (judgingScore >= 2) result += "J";
    else result += "P";

    const mbtiType = result;
    resultText.textContent = `Tipe MBTI Anda: ${mbtiType}`;
    resultDescription.textContent = mbtiDescriptions[mbtiType] || "Deskripsi tidak tersedia untuk tipe MBTI ini.";
}

function resetQuiz() {
    currentQuestion = 0;
    answers = [];
    resultDiv.classList.add("hidden");
    yesBtn.disabled = false;
    noBtn.disabled = false;
    displayQuestion();
}

function updateProgressBar() {
    const progress = ((currentQuestion + 1) / questions.length) * 100;
    progressBar.style.width = `${progress}%`;
}

displayQuestion();

yesBtn.addEventListener("click", () => handleAnswer(true));
noBtn.addEventListener("click", () => handleAnswer(false));
resetBtn.addEventListener("click", resetQuiz);
