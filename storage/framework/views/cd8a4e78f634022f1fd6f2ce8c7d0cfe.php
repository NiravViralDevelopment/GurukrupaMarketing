<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Inquiry Received</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #D4AF37; color: white; padding: 20px; text-align: center; }
        .content { background: #f9f9f9; padding: 20px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #555; }
        .value { margin-top: 5px; }
        .footer { background: #333; color: white; padding: 15px; text-align: center; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Inquiry Received</h1>
        </div>
        
        <div class="content">
            <p>A new inquiry has been submitted through the website contact form.</p>
            
            <div class="field">
                <div class="label">Name:</div>
                <div class="value"><?php echo e($inquiry->name); ?></div>
            </div>
            
            <div class="field">
                <div class="label">Email:</div>
                <div class="value"><?php echo e($inquiry->email); ?></div>
            </div>
            
            <?php if($inquiry->phone): ?>
            <div class="field">
                <div class="label">Phone:</div>
                <div class="value"><?php echo e($inquiry->phone); ?></div>
            </div>
            <?php endif; ?>
            
            <?php if($inquiry->subject): ?>
            <div class="field">
                <div class="label">Subject:</div>
                <div class="value"><?php echo e($inquiry->subject); ?></div>
            </div>
            <?php endif; ?>
            
            <?php if($inquiry->project): ?>
            <div class="field">
                <div class="label">Interested Project:</div>
                <div class="value"><?php echo e($inquiry->project->title); ?></div>
            </div>
            <?php endif; ?>
            
            <div class="field">
                <div class="label">Message:</div>
                <div class="value"><?php echo e($inquiry->message); ?></div>
            </div>
            
            <div class="field">
                <div class="label">Submitted:</div>
                <div class="value"><?php echo e($inquiry->created_at->format('M d, Y \a\t g:i A')); ?></div>
            </div>
        </div>
        
        <div class="footer">
            <p>This inquiry was submitted through the Gurukrupa Real Estate website.</p>
        </div>
    </div>
</body>
</html>
<?php /**PATH E:\Working\GurukrupaMarketing\resources\views/emails/inquiry.blade.php ENDPATH**/ ?>