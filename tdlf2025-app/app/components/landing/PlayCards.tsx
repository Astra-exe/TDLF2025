"use client";

import React, { useRef } from "react";

export default function PlayCards() {
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
        <div className="relative z-30">
          <h4 className="text-2xl font-bold">
            Reglas claras, competencia intensa{" "}
            <span className="text-primary">
              ¡Así se juega en nuestro torneo!
            </span>
          </h4>
          <ul className="mt-7 list-disc grid gap-y-3.5 list-inside">
            <li>
              Partidos a 10 puntos o 20 minutos. Gana quien llegue a 10 o tenga
              la ventaja al finalizar el tiempo.
            </li>
            <li>Se juega un punto para determinar quién saca.</li>
            <li>
              Si no se presenta una pareja en 5 minutos, se considera pérdida
              por default, y se asignan solo 5 puntos a la pareja ganadora.
            </li>
            <li>
              La pareja ganadora actúa como juez de línea y juez central en el
              siguiente partido.
            </li>
          </ul>
        </div>
      </article>
      <article className="relative px-8 py-10 bg-gradient-to-b from-dark/40 border border-dotted border-neutral-700/80 group/card">
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
        <div className="relative z-30">
          <h4 className="text-2xl font-bold">
            ¡Solo los mejores avanzan!{" "}
            <span className="text-primary">
              ¿Podras avanzar a la próxima fase?
            </span>
          </h4>
          <p className="mt-5">Detalles para avanzar:</p>
          <ul className="mt-7 list-disc grid gap-y-3.5 list-inside">
            <li>Se juega por sistema de doble eliminación.</li>
            <li>
              Una pareja queda eliminada del torneo tras perder dos partidos.{" "}
            </li>
            <li>
              Avanzan a la siguiente fase las dos primeras parejas de cada
              grupo.
            </li>
            <li>
              Las parejas se clasifican en función de los partidos ganados, y en
              caso de empate, se desempatará por los puntos obtenidos.
            </li>
          </ul>
        </div>
      </article>
      <article className="relative px-8 py-10 bg-gradient-to-b from-dark/40 border border-dotted border-neutral-700/80 group/card">
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
        <div className="relative z-30">
          <h4 className="text-2xl font-bold">
            ¡Todo bajo control!{" "}
            <span className="text-primary">Consejos clave para competir</span>
          </h4>
          <p className="mt-5">Prepara tu juego:</p>
          <ul className="mt-7 list-disc grid gap-y-3.5 list-inside">
            <li>
              Las parejas deberán ir uniformados, playera del mismo color o
              similar.
            </li>
            <li>
              Los lentes de protección no son obligatorios, más si
              recomendables.
            </li>
            <li>Recomendable el uso de gorra y bloqueador.</li>
            <li>Lleva toalla para el sudor y mantente hidratado.</li>
            <li>Ve el status de tu posición en la página de tu grupo.</li>
          </ul>
        </div>
      </article>
    </div>
  );
}
