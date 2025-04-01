"use client";

import React, { useRef } from "react";

export function MouseFollowWrapper({
  children,
}: {
  children: React.ReactNode;
}) {
  const cardsContainerRef = useRef<HTMLDivElement | null>(null);

  const handleMouseMove = (event: React.MouseEvent<HTMLElement>) => {
    const cards = cardsContainerRef.current?.children;
    if (cards) {
      for (const card of Array.from(cards)) {
        if (card instanceof HTMLElement) {
          const rect = card.getBoundingClientRect();
          const x = event.clientX - rect.left;
          const y = event.clientY - rect.top;
          card.style.setProperty("--mouse-x", `${x}px`);
          card.style.setProperty("--mouse-y", `${y}px`);
        }
      }
    }
  };

  return (
    <div
      className="mt-10 grid sm:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-5 group/container"
      onMouseMove={handleMouseMove}
      ref={cardsContainerRef}
    >
      {children}
    </div>
  );
}

export function MouseFollowCard({ children }: { children: React.ReactNode }) {
  return (
    <article className="sm:col-span-2 lg:col-span-1 relative px-8 py-10 bg-gradient-to-b from-dark/40 border border-dotted border-neutral-700/80 group/card">
      <div
        className="h-full w-full absolute top-0 left-0 transition-opacity z-20 opacity-0 group-hover/card:opacity-100"
        style={{
          background: `radial-gradient(800px circle at var(--mouse-x) var(--mouse-y),#e6135733,transparent 40%)`,
        }}
      ></div>
      <div
        className="h-full w-full absolute top-0 left-0 transition-opacity z-10"
        style={{
          background: `radial-gradient(600px circle at var(--mouse-x) var(--mouse-y),#e6135733,transparent 40%)`,
        }}
      ></div>
      {children}
    </article>
  );
}
