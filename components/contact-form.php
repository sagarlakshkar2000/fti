<form class="space-y-6" id="contactForm">
  <div class="grid md:grid-cols-2 gap-6">
    <div>
      <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
      <input type="text" id="name" name="name" required
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div>
      <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
      <input type="email" id="email" name="email" required
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
    </div>
  </div>

  <div>
    <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
    <input type="text" id="subject" name="subject" required
      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
  </div>

  <div>
    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
    <textarea id="message" name="message" rows="5" required
      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
  </div>

  <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 smooth-transition font-semibold">
    Send Message
  </button>
</form>

<script>
  document.getElementById('contactForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Thank you for your message! We will get back to you soon.');
    this.reset();
  });
</script>
