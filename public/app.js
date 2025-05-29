import { createClient } from "https://cdn.jsdelivr.net/npm/@supabase/supabase-js/+esm";

export const supabase = createClient(
  "https://qgtscfovmqrlqlfbaijy.supabase.co",
  "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InFndHNjZm92bXFybHFsZmJhaWp5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDg0OTgzNzEsImV4cCI6MjA2NDA3NDM3MX0.RnrY9mUA21Rv4XoA4md2qsCqBpTFkpe51OX1lZ8vLWY"
);

async function loadPoems() {
  const path = window.location.pathname;

  if (path.endsWith("index.html") || path === "/") {
    const { data, error } = await supabase
      .from("poem")
      .select("*")
      .order("created_at", { ascending: false });

    if (error) {
      console.error("Error loading poems:", error);
      return;
    }

    const container = document.getElementById("poems");
    if (!container) {
      console.warn("No container with id 'poems' found.");
      return;
    }

    data.forEach(poem => {
      const div = document.createElement("div");
      div.innerHTML = `
        <h2><a href="poem.html?id=${poem.id}">${poem.title}</a></h2>
        <p>${poem.content.slice(0, 150).replace(/\n/g, " ")}...</p>
        <hr>
      `;
      container.appendChild(div);
    });
  }
}

loadPoems();
