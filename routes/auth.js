const express = require('express');
const router = express.Router();
const User = require('../models/user');
const jwt = require('jsonwebtoken');
const bcrypt = require('bcryptjs');

// Middleware to check user role
function checkUserRole(req, res, next) {
    if (req.user.role > 1) {
        next();
    } else {
        res.status(403).send('Permission denied');
    }
}

// Register a new user
router.post('/register', async (req, res) => {
    const user = new User({
        role: req.body.role || 1,
        authLevel: req.body.authLevel || 1
    });
});

// Apply the middleware to the create post route
router.post('/blog/create', checkUserRole, (req, res) => {
    // ...existing code for creating a post...
});

module.exports = router;
