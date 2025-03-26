<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileConversionController extends Controller
{
    /**
     * Constructor with middleware to check user limits
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
        $this->middleware('conversion.limit')->except(['showDashboard']);
    }

    /**
     * Show the dashboard view
     */
    public function showDashboard()
    {
        return view('dashboard');
    }

    /**
     * Show the limit reached page
     */
    public function limitReached(Request $request)
    {
        $limit = $request->query('limit', 50);
        $isPremium = $request->query('isPremium', false);
        
        return view('limit-reached', [
            'limit' => $limit,
            'isPremium' => $isPremium
        ]);
    }

    /**
     * Convert PDF to Word
     */
    public function pdfToWord(Request $request)
    {
        $request->validate([
            'pdf_file' => 'required|file|mimes:pdf|max:10240', // Max 10MB
        ]);

        // Increment the user's usage count
        auth()->user()->incrementUsage();

        // Store the uploaded file
        $pdfFile = $request->file('pdf_file');
        $filename = Str::random(20) . '.pdf';
        $pdfPath = $pdfFile->storeAs('uploads/pdf', $filename, 'public');

        // Process PDF to Word conversion (you'll need to implement this with a library)
        // For now, we'll just return a success message
        return view('conversion.result', [
            'status' => 'success',
            'message' => 'PDF to Word conversion started.',
            'original_file' => $pdfFile->getClientOriginalName(),
            'converted_file' => null
        ]);
    }

    /**
     * Convert Word to PDF
     */
    public function wordToPdf(Request $request)
    {
        $request->validate([
            'word_file' => 'required|file|mimes:doc,docx|max:10240', // Max 10MB
        ]);

        // Increment the user's usage count
        auth()->user()->incrementUsage();

        // Store the uploaded file
        $wordFile = $request->file('word_file');
        $filename = Str::random(20) . '.' . $wordFile->getClientOriginalExtension();
        $wordPath = $wordFile->storeAs('uploads/word', $filename, 'public');

        // Process Word to PDF conversion (you'll need to implement this with a library)
        // For now, we'll just return a success message
        return view('conversion.result', [
            'status' => 'success',
            'message' => 'Word to PDF conversion started.',
            'original_file' => $wordFile->getClientOriginalName(),
            'converted_file' => null
        ]);
    }

    /**
     * Convert JPG/PNG to WEBP
     */
    public function imageToWebp(Request $request)
    {
        $request->validate([
            'image_file' => 'required|file|mimes:jpg,jpeg,png|max:10240', // Max 10MB
        ]);

        // Increment the user's usage count
        auth()->user()->incrementUsage();

        // Store the uploaded file
        $imageFile = $request->file('image_file');
        $filename = Str::random(20) . '.' . $imageFile->getClientOriginalExtension();
        $imagePath = $imageFile->storeAs('uploads/images', $filename, 'public');

        // Process Image to WEBP conversion (you'll need to implement this with a library)
        // For now, we'll just return a success message
        return view('conversion.result', [
            'status' => 'success',
            'message' => 'Image to WEBP conversion started.',
            'original_file' => $imageFile->getClientOriginalName(),
            'converted_file' => null
        ]);
    }

    /**
     * Convert Voice to Text
     */
    public function voiceToText(Request $request)
    {
        $request->validate([
            'voice_file' => 'required|file|mimes:mp3,wav,ogg|max:10240', // Max 10MB
        ]);

        // Increment the user's usage count
        auth()->user()->incrementUsage();

        // Store the uploaded file
        $voiceFile = $request->file('voice_file');
        $filename = Str::random(20) . '.' . $voiceFile->getClientOriginalExtension();
        $voicePath = $voiceFile->storeAs('uploads/voice', $filename, 'public');

        // Process Voice to Text conversion (you'll need to implement this with a library)
        // For now, we'll just return a success message
        return view('conversion.result', [
            'status' => 'success',
            'message' => 'Voice to Text conversion started.',
            'original_file' => $voiceFile->getClientOriginalName(),
            'converted_file' => null
        ]);
    }

    /**
     * Convert Text to Voice
     */
    public function textToVoice(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:10000', // Max 10,000 characters
            'voice_type' => 'required|string|in:male,female', // Voice type options
        ]);

        // Increment the user's usage count
        auth()->user()->incrementUsage();

        // Process Text to Voice conversion (you'll need to implement this with a library)
        // For now, we'll just return a success message
        return view('conversion.result', [
            'status' => 'success',
            'message' => 'Text to Voice conversion started.',
            'original_file' => null,
            'converted_file' => null
        ]);
    }
}
