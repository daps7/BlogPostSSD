const mongoose = require('mongoose');

const userSchema = new mongoose.Schema({
    // ...existing code...
    role: {
        type: Number,
        enum: [0, 1, 2],
        default: 1
    },
    authLevel: {
        type: Number,
        enum: [1, 2],
        default: 1
    }
    // ...existing code...
});

module.exports = mongoose.model('User', userSchema);
