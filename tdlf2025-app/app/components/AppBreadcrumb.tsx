import React from "react";
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbLink,
  BreadcrumbList,
  BreadcrumbPage,
  BreadcrumbSeparator,
} from "@/app/components/ui/breadcrumb";

type BreadcrumbType = {
  label: string;
  href: string;
};

type AppBreadcrumbProps = {
  prevBreadcrumbs: BreadcrumbType[];
  currentPage: string;
};

export default function AppBreadcrumb({
  prevBreadcrumbs,
  currentPage,
}: AppBreadcrumbProps) {
  return (
    <div>
      <Breadcrumb>
        <BreadcrumbList>
          {prevBreadcrumbs.map((breadcrumb) => {
            return (
              <React.Fragment key={breadcrumb.href}>
                <BreadcrumbItem>
                  <BreadcrumbLink href={breadcrumb.href}>
                    {breadcrumb.label}
                  </BreadcrumbLink>
                </BreadcrumbItem>
                <BreadcrumbSeparator>/</BreadcrumbSeparator>
              </React.Fragment>
            );
          })}
          <BreadcrumbItem>
            <BreadcrumbPage>{currentPage}</BreadcrumbPage>
          </BreadcrumbItem>
        </BreadcrumbList>
      </Breadcrumb>
    </div>
  );
}
