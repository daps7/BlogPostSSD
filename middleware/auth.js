const jwt = require('jsonwebtoken');

function authenticateToken(req, res, next) {
    const token = req.header('Authorization');
    if (!token) return res.status(401).send('Access Denied');

    try {
        const verified = jwt.verify(token, process.env.TOKEN_SECRET);
        req.user = verified;
        next();
    } catch (err) {
        res.status(400).send('Invalid Token');
    }
}

function authorizeRole(minAuthLevel) {
    return (req, res, next) => {
        if (req.user.authLevel < minAuthLevel) {
            return res.status(403).send('Access Denied');
        }
        next();
    };
}

module.exports = { authenticateToken, authorizeRole };
