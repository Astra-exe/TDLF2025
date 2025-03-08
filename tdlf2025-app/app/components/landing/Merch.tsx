"use client";
import { useEffect, useState } from "react";
import Image from "next/image";
import merchData from "@/app/data/merch.json";

export default function Merch() {
  const [indexMerchItem, setIndexMerchItem] = useState(0);
  const [principalImg, setPrincipalImg] = useState("");

  useEffect(() => {
    setPrincipalImg(merchData[indexMerchItem].images[0]);
  }, [indexMerchItem]);

  const handleChangeShirtMerch = () => {
    setIndexMerchItem(0);
  };

  const handleChangeCapMerch = () => {
    setIndexMerchItem(1);
  };

  const handleChangeImg = (imgUrl: string) => {
    setPrincipalImg(imgUrl);
  };

  const merchItem = merchData[indexMerchItem];

  return (
    <section className="mt-20">
      <div className="mb-12 flex flex-col xs:flex-row justify-center gap-y-6 gap-x-7">
        <button
          className={`px-4 xs:px-6 py-3 border cursor-pointer xs:min-w-[150px] hover:bg-accent hover:text-white transition-colors ${
            indexMerchItem === 0 && "bg-accent text-white"
          }`}
          onClick={handleChangeShirtMerch}
        >
          Ver Playera
        </button>
        <button
          className={`px-6 py-3 border cursor-pointer xs:min-w-[150px] hover:bg-accent hover:text-white transition-colors ${
            indexMerchItem === 1 && "bg-accent text-white"
          }`}
          onClick={handleChangeCapMerch}
        >
          Ver Gorra
        </button>
      </div>
      <article className="flex flex-col lg:items-start lg:flex-row gap-y-10 gap-x-12">
        <div className="flex flex-col-reverse xs:flex-row gap-x-7 gap-y-3 justify-center lg:justify-start">
          {/* Options */}
          <div className="flex xs:flex-col gap-y-2">
            {merchItem.images.map((imageUrl) => {
              return (
                <button
                  key={`merch-${imageUrl}`}
                  className="cursor-pointer"
                  onClick={() => handleChangeImg(imageUrl)}
                >
                  <picture className="inline-block p-3 border border-dotted border-gray-400 bg-gray-200">
                    <Image
                      src={imageUrl}
                      alt="Imagen"
                      width={340}
                      height={340}
                      className="max-w-[70px]"
                    />
                  </picture>
                </button>
              );
            })}
          </div>
          {/* Principal Img */}
          {principalImg && (
            <picture className="lg:w-[340px] inline-block p-8 bg-gray-300">
              <Image
                src={principalImg}
                alt="Merch TDLF-2025"
                width={340}
                height={340}
                className="sm:max-w-[300px] w-full h-full aspect-square object-cover"
              />
            </picture>
          )}
        </div>
        {/* Merch Info */}
        <div>
          <h4 className="text-xl font-bold">{merchItem.title}</h4>
          <p className="leading-6 md:leading-7">{merchItem.description}</p>
          <a
            href="https://heyzine.com/flip-book/b882556d0c.html"
            target="_blank"
            rel="noopener noreferrer"
            className="inline-block mt-10 px-7 py-5 font-bold bg-primary text-white hover:opacity-85 hover:scale-105 transition-all"
          >
            Ver todo el catalogo
          </a>
        </div>
      </article>
    </section>
  );
}
