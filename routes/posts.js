const express = require('express');
const router = express.Router();
const { authenticateToken, authorizeRole } = require('../middleware/auth');

// Add a new post (only journalists)
router.post('/', authenticateToken, authorizeRole(2), (req, res) => {
    // ...existing code...
});

// Edit a post (only journalists)
router.put('/:id', authenticateToken, authorizeRole(2), (req, res) => {
    // ...existing code...
});

// Delete a post (only journalists)
router.delete('/:id', authenticateToken, authorizeRole(2), (req, res) => {
    // ...existing code...
});

module.exports = router;
