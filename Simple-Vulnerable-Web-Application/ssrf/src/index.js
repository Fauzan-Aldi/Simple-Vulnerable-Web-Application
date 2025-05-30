const express = require('express');
const axios = require('axios');
const path = require('path');

const app = express();
const port = 80;

app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));

app.use(express.static(path.join(__dirname, 'public')));

app.get('/', async (req, res) => {
    res.render('index');
});

app.get('/proxy', async (req, res) => {
    const username = req.query.url;

    if (!username) {
        res.render('error', { content: 'No username provided' });
        return;
    }

    // if (username.includes('127.0.0.1')) {
    //     res.render('error', { content: "Forbidden" });
    //     return;
    // }

    try {
        const github = axios.create({
            baseURL: 'https://github.com',
        });
        const response = await github.get(`/${username}`);
        app.locals.fetchedContent = response.data;
        res.render('result');
    } catch (error) {
        res.render('error', { content: error.message });
    }
});

app.get('/result', (req, res) => {
    res.send(app.locals.fetchedContent || 'No content available');
});

app.get('/admin', (req, res) => {
    if (req.ip === '127.0.0.1' || req.ip === '::ffff:127.0.0.1') {
        res.render('admin', { content: process.env.FLAG });
    } else {
        console.log(req.ip);
        res.render('error', { content: "Forbidden" });
    }
});

app.listen(port, () => {
    console.log(`Server running on port ${port}`);
})
